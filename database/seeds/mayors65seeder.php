<?php
use Illuminate\Database\Seeder;
use App\mayors65m;

class mayors65seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$row = 1;
		if (($handle = fopen("mayors65.csv", "r")) !== FALSE) {
			$columnes = fgetcsv($handle, 1000, ",");
			/*
			echo $columnes[0]."\t".$columnes[1]."\t";
	        $num = count($columnes);
	        for ($c=2; $c<$num; $c++) {
	            echo $columnes[$c] . "\t";
	        }
	        echo "\n";
			*/
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        echo "[REG:$num] ";
		        $row++;
		        $dte = $data[0];
		        $barri = $data[1];
		        $total = $data[2];

		        $mayors65 = new mayors65m();
		        $mayors65->dte = $dte;
		        $mayors65->barris = $barri;
		        $mayors65->total = $total;

		        $mayors65->save();
		        /*
		        for ($c=2; $c < $num; $c++) {
		            //echo $data[$c] . "\t";
		            $preu = new Preu();
		            $preu->barri = $barri;
		            $preu->districte = $districte;
		            $preu->titol = $columnes[$c];
		            $preu->any = intval(substr($columnes[$c],0,4));
		            $preu->semestre = intval(substr($columnes[$c],4));
		            $preu->preu = $data[$c];
		            $preu->save();
		        }
		        */
		        echo "\n";
		    }
		    fclose($handle);
		}
    }
}
