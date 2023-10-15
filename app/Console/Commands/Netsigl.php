<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Netsigl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'netsigl:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Netsigl data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // sendRequest
        $url = "https://burkinanetsigl.com/api/36/events.json?orgUnit=Ize8xlE9AdQ&program=pYGIlffbGeL&startDate=2023-07-20&endDate=2023-07-26";
        $url = "https://burkinanetsigl.com/api/36/events.json?fields=*&orgUnit=zmSNCYjqQGj&ouMode=DESCENDANTS&program=pYGIlffbGeL&fields=trackedEntityInstance,dataValues[dataElement,value]&lastUpdateDuration=5min&paging=false";

        $username = 'admin';

        $password = 'PQGyzV6LMNUUxSrXz2F-q';

        $ch = curl_init ();

        $headr = array ();

        $headr [] = 'Content-type: application/json';

        $headr [] = 'Authorization: Basic ' . base64_encode ( $username . ":" . $password );

        curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );

        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headr );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );

        //curl_setopt ($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );

        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

        $data = curl_exec($ch);

        //$body = curl_exec($ch);

        if ($data === false)
        {
            // throw new Exception('Curl error: ' . curl_error($crl));

            print_r ( 'Curl error: ' . curl_error ( $ch ) );
        }
        //else {echo "Connexion reussi".PHP_EOL;}

        curl_close ( $ch );

        $datas = json_decode ( $data );
        $ordonnnce_id = NULL;
        $name_product = NULL;
        $orgunit_id = NULL;
        $orgunit_name = NULL;
        $date_dispensation = NULL;
        $quantity_product = NULL;
        $code_product = NULL;
        $type_transaction = NULL;
        // $drugs_dispensation = NULL;




        // return response()->json($datas);
        for($i=0; $i<count($datas->events); $i++){
            $datae = ($datas->events)[$i];
            // return response()->json($datae);
            $dataElement = $datae->dataValues;
            $k = 0;
            // return response()->json($dataElement);
            for($k=0; $k<count($dataElement); $k++){
                // NUMERO ORDONNANCE
                if($dataElement[$k]->dataElement == env('ordonnnce_id')){
                    $ordonnnce_id = $dataElement[$k]->value;
                }

                // NOM DU PRODUIT
                if($dataElement[$k]->dataElement == env('name_product')){
                    $name_product = $dataElement[$k]->value;
                }

                // ORG UNIT ID
                $orgunit_id = $datae->orgUnit;

                // ORG UNIT NAME
                $orgunit_name = $datae->orgUnitName;

                // DATE DISPENSATION
                if($dataElement[$k]->dataElement == env('date_dispensation')){
                    $date_dispensation = $dataElement[$k]->value;
                }

                // QUANTITE PRODUIT
                if($dataElement[$k]->dataElement == env('quantity_product')){
                    $quantity_product = $dataElement[$k]->value;
                }

                // CODE PRODUIT
                if($dataElement[$k]->dataElement == env('code_product')){
                    $code_product = $dataElement[$k]->value;
                }

                // TYPE TRANSACTION
                if($dataElement[$k]->dataElement == env('type_transaction')){
                    $type_transaction = $dataElement[$k]->value;
                }
            }
            if($type_transaction == 4){
                $netsigl = DB::table("netsigl")->where('ordonnance_id', $ordonnnce_id)->get();
                // if(count($netsigl)<=0){
                    DB::insert('insert into netsigl (ordonnance_id, name_product, orgunit_id, orgunit_name, date_dispensation, quantity_product, code_product) values (?, ?, ?, ?, ?, ?, ?)',
                    [$ordonnnce_id, $name_product, $orgunit_id, $orgunit_name, $date_dispensation,  $quantity_product, $code_product]);
                // }


            }


            // return $datae;
        }

            $this->info('Success');
    }
}
