server 'infolace.net', :app, :web, :primary => true

set :domain,      "develop.company-site.net"
set :user,        "usernmae"
set :deploy_to,   "/var/www/#{domain}/#{application}"
set :branch,      "develop"
