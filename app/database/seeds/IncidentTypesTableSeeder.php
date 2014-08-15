<?php

class IncidentTypesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('incident_types')->delete();

        $incidentType = new IncidentType;

        $incidentType->name = 'Red Card';

        $incidentType->save();
    }

}