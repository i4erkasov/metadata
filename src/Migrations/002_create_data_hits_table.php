<?php
namespace App\Migrations;
use App\App;
use App\Database\IDbManager;
use App\Database\Tables\DataHits;
//use App\Database\Tables\DataHits;
use Psr\Log\LoggerInterface;

class CreateHitsTable extends Migration
{
    public function up(){
        $result = true;
        try {
            $db = App::getInstance()->getSlim()->getContainer()->get(IDbManager::class);
            $table = new DataHits();
            $db->createTable($table);
        }catch (\Exception $ex){
            $result = false;
            $logger = App::getInstance()->getSlim()->getContainer()->get(LoggerInterface::class);
            $logger->info($ex->getMessage());
        }
        return $result;
    }
}