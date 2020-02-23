<?php
namespace Velaa\Core\StubGenerators;

class MigrationStubGenerator
{
    public static function generate($classname)
    {
        $tablename = strtolower($classname) . 's';
        $migrationname = time(). strtolower($classname) . 'smigration';

        $stub = file_get_contents(base_path().DIRECTORY_SEPARATOR. 'core'. DIRECTORY_SEPARATOR. 'StubGenerators'.DIRECTORY_SEPARATOR.'stubs'.DIRECTORY_SEPARATOR.'Migration.stub');

        $stub = str_replace('{className}', $classname, $stub);

        $stub = str_replace('{tablename}', $tablename, $stub);


        file_put_contents(base_path().DIRECTORY_SEPARATOR. 'app'. DIRECTORY_SEPARATOR.'Migrations'.DIRECTORY_SEPARATOR.$migrationname.'.php', $stub);

        return $migrationname;
    }
}
