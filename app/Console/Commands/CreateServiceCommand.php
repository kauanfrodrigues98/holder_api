<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {all?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Service File';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            $name = $this->argument('name');

            $all = $this->hasArgument('all') ? $this->argument('all') : '';

//            $this->generateService($name);

//            if($this->argument('all') === '-a') {
                $this->generateAll($name);
//            }

            $this->info("{$name} criado com sucesso");
        } catch(\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function generateService(string $name)
    {
        if (!File::isDirectory("App/Services")) {
            File::makeDirectory("App/Services", 0755, true, true);
            $this->info('Diretório App/Services foi criado.');
        }

        $content = "<?php

namespace App\Services;

use App\Repository\\{$name}\\{$name}RepositoryInterface;

class $name"."Service {
    public function __construct(
        private {$name}RepositoryInterface $".strtolower($name)."Repository
    ) {}
}";

        file_put_contents("App/Services/" . $name . "Service.php", $content);

        $this->info("Service criado com sucesso");

        return $content;
    }

    private function generateInterface(string $name)
    {
        if (!File::isDirectory("App/Repository/{$name}")) {
            File::makeDirectory("App/Repository/{$name}", 0755, true, true);
            $this->info("Diretório App/Repository/$name foi criado.");
        }

        $content = "<?php

namespace App\Repository\\$name;

interface $name"."RepositoryInterface {
    //
}";

        file_put_contents("App/Repository/$name/" . $name . "RepositoryInterface.php", $content);

        $this->info("Interface criado com sucesso");

        return $content;
    }

    private function generateRepository(string $name)
    {
        if (!File::isDirectory("App/Repository/$name")) {
            File::makeDirectory("App/Repository/$name", 0755, true, true);
            $this->info("Diretório App/Repository/$name foi criado.");
        }

        $model = '$model';

        $content = "<?php

namespace App\Repository\\$name;

use App\Repository\\$name\\$name"."RepositoryInterface;
use App\Models\\$name;

class $name"."Repository implements $name"."RepositoryInterface {
    public function __construct(
        private $name $model
    ) {}
}";

        file_put_contents("App/Repository/$name/" . $name . "Repository.php", $content);

        $this->info("Repository criado com sucesso");

        return $content;
    }

    private function generateAll(string $name)
    {
        $this->generateService($name);
        $this->generateInterface($name);
        $this->generateRepository($name);
    }
}
