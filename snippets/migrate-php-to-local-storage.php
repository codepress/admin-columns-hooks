<?php

use AC\ListScreenRepository\Storage;

/**
 * Use this snippet when you have still PHP defined list screens in your code and you want to migrate all list screens to our new Local Storage feature.
 * Usage:
 *      1) Make sure that Local Storage is enabled and set to writable (see documentation URL below)
 *      2) Run the snippet by adding a param in the admin url like: /wp-admin/edit.php?migrate-acp-php-list-screens
 *      3) When the migration is triggered, you should see some feedback if your list screens were migrated
 *      4) To check if the migration was successfull, check the directory defined in Local Storage to see if it contains the migrated list screens
 *      4) If the list screens are available, you can remove the old snippet that contains the PHP defined list screens
 * Documentation:
 * @url https://docs.admincolumns.com/article/58-how-to-setup-local-storage
 */
class MigratePhpListScreensToLocalStorage
{

    public function __construct()
    {
        add_action('ac/list_screens', [$this, 'migrate'], 21);
    }

    /**
     * Check if Local Storage is active by removing all known database and collection repositories
     * @return bool
     */
    private function isLocalStorageActive()
    {
        $repos = AC()->get_storage()->get_repositories();

        unset($repos['acp-database']);
        unset($repos['acp-collection']);

        return count($repos) > 0;
    }

    /**
     * Remove the PHP defined list screen repository and database repository and return the remaining list screens as storage service
     * @return Storage
     */
    private function prepareLocalStorageRepositories()
    {
        $repositories = AC()->get_storage()->get_repositories();

        unset($repositories['acp-collection']);
        unset($repositories['acp-database']);

        AC()->get_storage()->set_repositories($repositories);

        return AC()->get_storage();
    }

    public function migrate()
    {
        if ( ! filter_input(INPUT_GET, 'migrate-acp-php-list-screens')) {
            return;
        }

        if ( ! AC()->get_storage()->has_repository('acp-collection')) {
            wp_die('PHP Storage is not active, so script will not run');
        }

        if ( ! $this->isLocalStorageActive()) {
            wp_die('Local Storage is not active, so script will not run');
        }

        $processed = [];
        $phpRepository = AC()->get_storage()->get_repository('acp-collection');
        $localStorageRepositories = $this->prepareLocalStorageRepositories();

        foreach ($phpRepository->find_all() as $list_screen) {
            if ( ! $localStorageRepositories->exists($list_screen->get_id())) {
                $localStorageRepositories->save($list_screen);
                $processed[] = $list_screen;
            }
        }

        echo '<strong>Processed</strong><br>';
        foreach ($processed as $list_screen) {
            echo $list_screen->get_id()->get_id() . ' - ' . $list_screen->get_title() . '<br>';
        }

        exit;
    }

}

new MigratePhpListScreensToLocalStorage();
