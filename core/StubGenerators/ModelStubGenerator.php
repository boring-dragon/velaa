<?php

namespace Velaa\Core\StubGenerators;

class ModelStubGenerator
{
    public static function generate($classname)
    {
        $stub = file_get_contents(base_path().DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'StubGenerators'.DIRECTORY_SEPARATOR.'stubs'.DIRECTORY_SEPARATOR.'Model.stub');

        $stub = str_replace('{className}', $classname, $stub);

        file_put_contents(base_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.$classname.'.php', $stub);
    }
}
