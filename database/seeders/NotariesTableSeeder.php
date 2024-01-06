<?php

namespace Database\Seeders;

use App\Models\Notary;
use Illuminate\Database\Seeder;

class NotariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $escribano = new Notary();
        $escribano->nombre = "Colegio";
        $escribano->apellido = "Colegio";
        $escribano->matricula = "0";
        $escribano->email = "colegiodeescribanosformosa@gmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "admin";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "Ariel";
        $escribano->apellido = "Bernardo";
        $escribano->matricula = "0";
        $escribano->email = "arielbernardo@hotmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "admin";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "MARIA EUGENIA";
        $escribano->apellido = "COSENZA";
        $escribano->matricula = "167";
        $escribano->email = "escribaniacosenza@gmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "LIDIA YESICA";
        $escribano->apellido = "HAMERNIK";
        $escribano->matricula = "233";
        $escribano->email = "yesicahamernik@hotmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "DAVID";
        $escribano->apellido = "CUÑO";
        $escribano->matricula = "196";
        $escribano->email = "david.cuno@escribaniacuno.com.ar";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "CARLOS MIGUEL";
        $escribano->apellido = "IRIONDO";
        $escribano->matricula = "56";
        $escribano->email = "escribaniairiondo@yahoo.com.ar";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "MIRIAN BEATRIZ";
        $escribano->apellido = "BUDIÑO";
        $escribano->matricula = "94";
        $escribano->email = "mirianbudino@gmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "AGUSTIN BARBERIS";
        $escribano->apellido = "GAYA";
        $escribano->matricula = "199";
        $escribano->email = "agusbarberis@yahoo.com.ar";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "CARLOS OSCAR";
        $escribano->apellido = "SILVA";
        $escribano->matricula = "16";
        $escribano->email = "notariocarlossilva@gmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = "OSCAR ANIBAL";
        $escribano->apellido = "LEGUIZAMON";
        $escribano->matricula = "157";
        $escribano->email = "oalegui@hotmail.com";
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ELVA AZUCENA';
        $escribano->apellido = "PAZ";
        $escribano->matricula = '26';
        $escribano->email = 'elvapaz@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'LEONOR L.';
        $escribano->apellido = "GONZALEZ DE MENDEZ";
        $escribano->matricula = '34';
        $escribano->email = 'escleomendez@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'BIBIANA HAYDEE';
        $escribano->apellido = "GAY";
        $escribano->matricula = '69';
        $escribano->email = 'bibiana_gay@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIANA SOLEDAD';
        $escribano->apellido = "GARRE";
        $escribano->matricula = '95';
        $escribano->email = 'garremarianasoledad@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'LUCIA E.';
        $escribano->apellido = "ARANDA";
        $escribano->matricula = '66';
        $escribano->email = 'escribanaarandalucia@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'FABIANA ELIZABETH';
        $escribano->apellido = "ALMIRON";
        $escribano->matricula = '130';
        $escribano->email = 'fabianaalmiron@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA ISABEL';
        $escribano->apellido = "ALBERDI";
        $escribano->matricula = '36';
        $escribano->email = 'mialberdi@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'KARINA RUTH';
        $escribano->apellido = "RHINER";
        $escribano->matricula = '63';
        $escribano->email = 'karinarhiner@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'LUIS ALEJANDRO';
        $escribano->apellido = "DIAZ AVENDAÑO";
        $escribano->matricula = '65';
        $escribano->email = 'notarioluisdiaz@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MIGUEL CARLOS ';
        $escribano->apellido = "TORRES BARBERIS";
        $escribano->matricula = '41';
        $escribano->email = 'mctorresbarberis@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA PATRICIA';
        $escribano->apellido = "POZZI";
        $escribano->matricula = '73';
        $escribano->email = 'registro20@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'OSVALDO ALBERTO';
        $escribano->apellido = "TARANTINI";
        $escribano->matricula = '62';
        $escribano->email = 'escribaniatarantini@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'VICTOR LUIS';
        $escribano->apellido = "ARCE";
        $escribano->matricula = '133';
        $escribano->email = 'escribaniaarce@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'SERGIO';
        $escribano->apellido = "CAMPUZANO";
        $escribano->matricula = '145';
        $escribano->email = 'sdcampuzano007@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'JOSE MARIA';
        $escribano->apellido = "PARAJON";
        $escribano->matricula = '27';
        $escribano->email = 'escribania_parajon@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'JOSE LEANDRO';
        $escribano->apellido = "PARAJON";
        $escribano->matricula = '230';
        $escribano->email = 'parajonleandro@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'SARITA RAQUEL';
        $escribano->apellido = "GOMEZ";
        $escribano->matricula = '25';
        $escribano->email = 'not.sary@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA MARTA';
        $escribano->apellido = "POZZI";
        $escribano->matricula = '105';
        $escribano->email = 'escripozzi@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'SIRLEY MARIEL';
        $escribano->apellido = "NICORA";
        $escribano->matricula = '93';
        $escribano->email = 'sirleynicora@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA AZUCENA';
        $escribano->apellido = "AQUINO";
        $escribano->matricula = '114';
        $escribano->email = 'marizu_aquino@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'JUANA MARISA';
        $escribano->apellido = "ROJAS";
        $escribano->matricula = '104';
        $escribano->email = 'juanamarisa28@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA SILVANA';
        $escribano->apellido = "DELLAMEA";
        $escribano->matricula = '103';
        $escribano->email = 'davestudionotarial@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'BLANCO ANA';
        $escribano->apellido = "CAROLINA";
        $escribano->matricula = '191';
        $escribano->email = 'davestudionotarial@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'GABRIELA RODRIGUEZ';
        $escribano->apellido = "ROSADO";
        $escribano->matricula = '75';
        $escribano->email = 'gabrielarodriguezrosado@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";

        $escribano = new Notary();
        $escribano->nombre = 'MIGUEL ALEJANDRO';
        $escribano->apellido = "VERA";
        $escribano->matricula = '143';
        $escribano->email = 'escribanovera@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ZULMA NOEMI';
        $escribano->apellido = "CASTAGNE";
        $escribano->matricula = '102';
        $escribano->email = 'juridicosnotarial@castagne.arnetbiz.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MIGUEL ENRIQUE';
        $escribano->apellido = "ARAOZ";
        $escribano->matricula = '110';
        $escribano->email = 'notarioaraoz@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'VERGARA MAURICIO';
        $escribano->apellido = "MARTIN";
        $escribano->matricula = '224';
        $escribano->email = 'esc.mauriciovergara@gmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'HECTOR FABIO';
        $escribano->apellido = "MORAN";
        $escribano->matricula = '85';
        $escribano->email = 'notmoran@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'GERMAN';
        $escribano->apellido = "CITADINI PIRELLI";
        $escribano->matricula = '174';
        $escribano->email = 'gcitadini@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'HECTOR';
        $escribano->apellido = "PEDRETTI";
        $escribano->matricula = '61';
        $escribano->email = 'escribaniapedretti@clorinda-fsa.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'DORA GUILLERMINA';
        $escribano->apellido = "MIERS";
        $escribano->matricula = '90';
        $escribano->email = 'escribaniamiers@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ALEJANDRA GRACIELA';
        $escribano->apellido = "FERREYRA";
        $escribano->matricula = '98';
        $escribano->email = 'alitaferreyra@hotmal.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'JUAN JOSE';
        $escribano->apellido = "LAZARTE";
        $escribano->matricula = '92';
        $escribano->email = 'escribanialazarte@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ZUNILDA';
        $escribano->apellido = "GUILLEN";
        $escribano->matricula = '78';
        $escribano->email = 'zunilda_76@yahoo.com.ar';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MARIA CRISTINA';
        $escribano->apellido = "OCAMPO";
        $escribano->matricula = '236';
        $escribano->email = 'cristinaocampo_s@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'MONICA VIVIANA';
        $escribano->apellido = "MIRANDA";
        $escribano->matricula = '116';
        $escribano->email = 'miranda498@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'SONIA ELIZABETH';
        $escribano->apellido = "PETER";
        $escribano->matricula = '101';
        $escribano->email = 'escribaniapeter@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'FABIAN EDUARDO ENRIQUE';
        $escribano->apellido = "MENON";
        $escribano->matricula = '109';
        $escribano->email = 'fabian-menon@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'LILIANA NOEMI';
        $escribano->apellido = "REDONDO";
        $escribano->matricula = '108';
        $escribano->email = 'escriredondo@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'LUIS ANTONIO';
        $escribano->apellido = "GONZALEZ";
        $escribano->matricula = '134';
        $escribano->email = 'litogonz@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ROSALBA NOEMI';
        $escribano->apellido = "MAZA";
        $escribano->matricula = '159';
        $escribano->email = 'escribanamaza@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

        $escribano = new Notary();
        $escribano->nombre = 'ALICIA NOEMI';
        $escribano->apellido = "LOPEZ";
        $escribano->matricula = '164';
        $escribano->email = 'escribaniaalicialopez@hotmail.com';
        $escribano->password = "123456";
        $escribano->tipo = "escribano";
        $escribano->habilitado = "habilitado";
        $escribano->save();

    }
}
