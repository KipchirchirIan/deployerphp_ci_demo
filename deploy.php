<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'ci_deployerphp_demo');

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
add('shared_files', [
    '.htaccess',
    '.env',
    'public/.htaccess'
]);
add('shared_dirs', [
    'writable/cache',
    'writable/logs',
    'writable/session',
    'writable/uploads',
]);

// Writable dirs by web server
add('writable_dirs', [
    'writable/cache',
    'writable/logs',
    'writable/session',
    'writable/uploads',
]);


// Hosts

host('home718553090.1and1-data.host')
    ->user('u91992593')
    ->stage('staging')
    ->set('deploy_path', '~/dep_playground');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');