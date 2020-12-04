<?php

use App\Equipo;
use App\Partido;
use App\User;
use App\Venta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedPartidos();
        $this->command->info('Tabla	partidos inicializada con datos!');

        self::seedEquipos();
        $this->command->info('Tabla	equipos inicializada con datos!');

        self::seedUsers();
        $this->command->info('Tabla	usuarios inicialiazada con datos!');

        self::seedVentas();
        $this->command->info('Tabla	ventas inicialiazada con datos!');

    }

    public function seedPartidos() {
        DB::table('partidos')->delete();
        $p = new Partido;
        $p->fecha = '2020-02-03';
        $p->hora = '09:00';
        $p->id_equipo_local = 14;
        $p->id_equipo_visitante = 25;
        $p->precio = '50';
        $p->comprado = 0;
        $p->save();
    }

    public function seedVentas() {
        DB::table('ventas')->delete();
        $v = new Venta;
        $v->id_partido = 1;
        $v->id_usuario = 1;
        $v->comprado = 0;
        $v->save();
    }

    public function seedUsers()
    {
        DB::table('users')->delete();
        $u = new User;
        $u->name = 'admin';
        $u->email = 'admin@admin.com';
        $u->rol = 'administrador';
        $u->password = bcrypt('admin');
        $u->save();


        $u2 = new User;
        $u2->name = 'user';
        $u2->email = 'user@gmail.com';
        $u2->rol = 'usuario';
        $u2->password = bcrypt('user');
        $u2->save();

    }

    public function seedEquipos() {
        DB::table('equipos')->delete();
        $e1 = new Equipo;
        $e1->nombre = 'Atlanta Hawks';
        $e1->estadio= 'State Farm Arena';
        $e1->capacidad = 18118;
        $e1->imagen = 'atlanta.jpg';
        $e1->save();

        $e2 = new Equipo;
        $e2->nombre = 'Boston Celtics';
        $e2->estadio= 'TD Garden';
        $e2->capacidad = 18264;
        $e2->imagen = 'boston.jpg';
        $e2->save();

        $e3 = new Equipo;
        $e3->nombre = 'Brooklyn Nets';
        $e3->estadio= 'Barclays Center';
        $e3->capacidad = 17732;
        $e3->imagen = 'brooklyn.jpg';
        $e3->save();

        $e4 = new Equipo;
        $e4->nombre = 'Charlotte Hornets';
        $e4->estadio= 'Spectrum Center';
        $e4->capacidad = 19077;
        $e4->imagen = 'charlotte.jpg';
        $e4->save();

        $e5 = new Equipo;
        $e5->nombre = 'Chicago Bulls';
        $e5->estadio= 'United Center';
        $e5->capacidad = 20917;
        $e5->imagen = 'chicago.jpg';
        $e5->save();

        $e6 = new Equipo;
        $e6->nombre = 'Cleveland Cavaliers';
        $e6->estadio= 'Rocket Mortgage FieldHouse';
        $e6->capacidad = 20562;
        $e6->imagen = 'cleveland.jpg';
        $e6->save();

        $e7 = new Equipo;
        $e7->nombre = 'Dallas Mavericks';
        $e7->estadio= 'American Airlines Center';
        $e7->capacidad = 19200;
        $e7->imagen = 'dallas.jpg';
        $e7->save();

        $e8 = new Equipo;
        $e8->nombre = 'Denver Nuggets';
        $e8->estadio= 'Pepsi Center';
        $e8->capacidad = 19155;
        $e8->imagen = 'denver.jpg';
        $e8->save();

        $e9 = new Equipo;
        $e9->nombre = 'Detroit Pistons';
        $e9->estadio= 'Little Caesars Arena';
        $e9->capacidad = 20491;
        $e9->imagen = 'detroit.jpg';
        $e9->save();

        $e10 = new Equipo;
        $e10->nombre = 'Golden State Warriors';
        $e10->estadio= 'Chase Center';
        $e10->capacidad = 18064;
        $e10->imagen = 'warriors.jpg';
        $e10->save();

        $e11 = new Equipo;
        $e11->nombre = 'Houston Rockets';
        $e11->estadio= 'Toyota Center';
        $e11->capacidad = 18055;
        $e11->imagen = 'houston.jpg';
        $e11->save();

        $e12 = new Equipo;
        $e12->nombre = 'Indiana Pacers';
        $e12->estadio= 'Bankers Life Fieldhouse';
        $e12->capacidad = 18165;
        $e12->imagen = 'pacers.jpg';
        $e12->save();

        $e13 = new Equipo;
        $e13->nombre = 'Los Angeles Clippers';
        $e13->estadio= 'Staples Center';
        $e13->capacidad = 19067;
        $e13->imagen = 'clippers.jpg';
        $e13->save();

        $e14 = new Equipo;
        $e14->nombre = 'Los Angeles Lakers';
        $e14->estadio= 'Staples Center';
        $e14->capacidad = 19067;
        $e14->imagen = 'lakers.jpg';
        $e14->save();

        $e15 = new Equipo;
        $e15->nombre = 'Memphis Grizzlies';
        $e15->estadio= 'FedExForum';
        $e15->capacidad = 18119;
        $e15->imagen = 'memphis.jpg';
        $e15->save();

        $e16 = new Equipo;
        $e16->nombre = 'Miami Heat';
        $e16->estadio= 'American Airlines Arena';
        $e16->capacidad = 19600;
        $e16->imagen = 'miami.jpg';
        $e16->save();

        $e17 = new Equipo;
        $e17->nombre = 'Milwaukee Bucks';
        $e17->estadio= 'Fiserv Forum';
        $e17->capacidad = 17500;
        $e17->imagen = 'milwaukee.jpg';
        $e17->save();

        $e18 = new Equipo;
        $e18->nombre = 'Minnesota Timberwolves';
        $e18->estadio= 'Target Center';
        $e18->capacidad = 19356;
        $e18->imagen = 'minnesota.jpg';
        $e18->save();

        $e19 = new Equipo;
        $e19->nombre = 'New Orleans Pelicans';
        $e19->estadio= 'Smoothie King Center';
        $e19->capacidad = 16867;
        $e19->imagen = 'pelicans.jpg';
        $e19->save();

        $e20 = new Equipo;
        $e20->nombre = 'New York Knicks';
        $e20->estadio= 'Madison Square Garden';
        $e20->capacidad = 19812;
        $e20->imagen = 'knicks.jpg';
        $e20->save();

        $e21 = new Equipo;
        $e21->nombre = 'Oklahoma City Thunder';
        $e21->estadio= 'Chesapeake Energy Arena';
        $e21->capacidad = 18203;
        $e21->imagen = 'okc.jpg';
        $e21->save();

        $e22 = new Equipo;
        $e22->nombre = 'Orlando Magic';
        $e22->estadio= 'Amway Center';
        $e22->capacidad = 18846;
        $e22->imagen = 'orlando.jpg';
        $e22->save();

        $e23 = new Equipo;
        $e23->nombre = 'Philadelphia 76ers';
        $e23->estadio= 'Wells Fargo Center';
        $e23->capacidad = 20478;
        $e23->imagen = 'philadelphia.jpg';
        $e23->save();

        $e24 = new Equipo;
        $e24->nombre = 'Phoenix Suns';
        $e24->estadio= 'Talking Stick Resort Arena';
        $e24->capacidad = 18055;
        $e24->imagen = 'phoenix.jpg';
        $e24->save();

        $e25 = new Equipo;
        $e25->nombre = 'Portland Trail Blazers';
        $e25->estadio= 'Moda Center';
        $e25->capacidad = 19441;
        $e25->imagen = 'portland.jpg';
        $e25->save();

        $e26 = new Equipo;
        $e26->nombre = 'Sacramento Kings';
        $e26->estadio= 'Golden 1 Center';
        $e26->capacidad = 17500;
        $e26->imagen = 'sacramento.jpg';
        $e26->save();

        $e27 = new Equipo;
        $e27->nombre = 'San Antonio Spurs';
        $e27->estadio= 'AT&T Center';
        $e27->capacidad = 18418;
        $e27->imagen = 'spurs.jpg';
        $e27->save();

        $e28 = new Equipo;
        $e28->nombre = 'Toronto Raptors';
        $e28->estadio= 'Scotiabank Arena';
        $e28->capacidad = 19800;
        $e28->imagen = 'toronto.jpg';
        $e28->save();

        $e29 = new Equipo;
        $e29->nombre = 'Utah Jazz';
        $e29->estadio= 'Vivint Smart Home Arena';
        $e29->capacidad = 19911;
        $e29->imagen = 'utah.jpg';
        $e29->save();

        $e30 = new Equipo;
        $e30->nombre = 'Washington Wizards';
        $e30->estadio= 'Capital One Arena';
        $e30->capacidad = 20356;
        $e30->imagen = 'washington.jpg';
        $e30->save();

    }
}
