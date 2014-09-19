server 'company-site.net', :app, :web, :primary => true

set :domain,      "company-site.net"
set :user,        "username"
set :deploy_to,   "/var/www/#{application}"
set :branch,      "master"
