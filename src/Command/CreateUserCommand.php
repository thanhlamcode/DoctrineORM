<?php

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:create-user', description: 'Creates a new user.')]
class CreateUserCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the new user')
            ->addOption('email', null, InputOption::VALUE_REQUIRED, 'The email of the new user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $username = $input->getArgument('username');
        $email = $input->getOption('email');

        if (!$email) {
            $output->writeln('<error>Email option is required.</error>');
            return Command::INVALID;
        }

        // Giả lập tạo user
        $output->writeln("Creating user: <info>$username</info> with email <info>$email</info>");

        // Ở đây bạn có thể gọi service, repository để lưu vào database...

        $output->writeln('<info>User created successfully!</info>');

        return Command::SUCCESS;
    }
}
