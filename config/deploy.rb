set :user, "root"
set :domain, "ve.cdf8hv8v.vesrv.com"
set :application, "communitybible"
set :repository,  "git@github.com:icastillo/Community-Bible-Church.git"
set :deploy_to, "/var/www/"

set :scm, "git"
set :branch, "master"
set :git_enable_submodules, 1

role :web, domain                          # Your HTTP server, Apache/etc
role :app, domain                          # This may be the same as your `Web` server
role :db, domain, :primary => true # This is where Rails migrations will run
#role :db, domain

# Add symlinks for config files
# Current links are:
# database.php, aws.config.inc.php, .htaccess, bootstrap.php
#
# Need to remove the following
# logs, cache

namespace :deploy do
  desc "Restart web server"
  task :restart do
    run "/etc/init.d/apache2 restart"
  end

  desc "Create all symlinks"
  task :symlink do
    run "ln -nfs #{shared_path}/config/database.php #{current_path}/application/config/database.php"
    run "ln -nfs #{shared_path}/config/aws.config.inc.php #{current_path}/application/classes/helper/vendor/awssdk/config.inc.php"
    run "ln -nfs #{shared_path}/settings/bootstrap.php #{current_path}/application/bootstrap.php"
    #run "ln -nfs #{shared_path}/settings/.htaccess #{current_path}/.htaccess"
    run "ln -nfs #{shared_path}/cache #{current_path}/application/cache"
    run "ln -nfs #{shared_path}/logs #{current_path}/application/logs"
  end
  
  desc "Delete unwanted files and folders"
  task :setupsite do
    run "rm -rf #{current_path}/.htaccess #{current_path}/DEVELOPERS.md #{current_path}/LICENSE.md #{current_path}/README.md #{current_path}/TESTING.md #{current_path}/application/logs #{current_path}/application/cache #{current_path}/application/config/database.php.template #{current_path}/application/config/f1.php.template"
    run "cp #{shared_path}/settings/.htaccess #{current_path}/.htaccess"
  end
  
end

after "deploy:update_code", "deploy:setupsite"
after "deploy", "deploy:cleanup"