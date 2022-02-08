<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'deployerphp_ci_demo');

// Default staging
set('default_stage', 'staging');

// PHP CLI
set('bin/php', '/usr/bin/php7.4-cli');

// HTTP user
//set('http_user', 'www-data');

// Write mode
set('writable_mode', 'chmod');

// Project repository
set('repository', 'git@github.com:KipchirchirIan/deployerphp_ci_demo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', [
    '.htaccess',
    '.env',
    'public/.htaccess'
]);
set('shared_dirs', [
    'writable/cache',
    'writable/logs',
    'writable/session',
    'writable/uploads',
]);

// Writable dirs by web server 
set('writable_dirs', [
    'writable/cache',
    'writable/logs',
    'writable/session',
    'writable/uploads',
]);


// Hosts

host('home718553090.1and1-data.host')
    ->user('u91992593')
    ->stage('staging')
    ->set('deploy_path', '~/{{application}}');
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
