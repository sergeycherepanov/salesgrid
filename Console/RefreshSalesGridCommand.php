<?php

namespace Sergeycherepanov\Salesgrid\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Sales\Model\ResourceModel\Grid;

/**
 * Class RefreshSalesGridCommand
 * @package Sergeycherepanov\Salesgrid\Console
 */
class RefreshSalesGridCommand extends Command
{
    /** @var Grid */
    private $grid;

    /**
     * RefreshSalesGridCommand constructor.
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
        parent::__construct();
    }

    /**
     * Configures the command.
     */
    protected function configure()
    {
        $this->setName('sergeycherepanov:salesgrid:refresh_sales_grid');
        $this->setDescription('Refresh Sales Grid');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Updating extra grid...");
        $this->grid->refreshBySchedule();
        $output->writeln("Grid updated successfully");
    }
}
