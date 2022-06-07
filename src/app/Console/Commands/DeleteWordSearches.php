<?php

namespace App\Console\Commands;

use App\Repositories\Database\WordDefinitionDatabaseRepository;
use Illuminate\Console\Command;

/**
 * Class DeleteWordSearches
 *
 * @package App\Console\Commands
 * @author Simon Peter Calamno
 * @since 2022.06.07
 */
class DeleteWordSearches extends Command
{
    /**
     * @var WordDefinitionDatabaseRepository
     */
    private $oWordDefinitionDatabaseRepository;

    /**
     * DeleteWordSearches constructor.
     * @param WordDefinitionDatabaseRepository $oWordDefinitionDatabaseRepository
     */
    public function __construct(WordDefinitionDatabaseRepository $oWordDefinitionDatabaseRepository)
    {
        parent::__construct();
        $this->oWordDefinitionDatabaseRepository = $oWordDefinitionDatabaseRepository;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:searches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncates all the tables related to word search';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->oWordDefinitionDatabaseRepository->truncateWordDefinitionTables();
    }
}
