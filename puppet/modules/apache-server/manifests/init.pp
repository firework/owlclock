class apache-server {

  package { 'apache2':
    ensure => 'present',
  }

  service { 'apache2':
    require   => [Package['apache2'], Exec['apache2-change-user']],
    ensure    => 'running',
    enable    => true,
    subscribe => [
      File['/etc/apache2/mods-enabled/rewrite.load'],
      File['/etc/apache2/sites-available/default'],
    ],
  }

  file { '/etc/apache2/mods-enabled/rewrite.load':
    require => Package['apache2'],
    ensure  => 'link',
    target  => '/etc/apache2/mods-available/rewrite.load',
  }

  file { '/etc/apache2/sites-available/default':
    require => Package['apache2'],
    ensure  => 'present',
    owner   => 'root',
    group   => 'root',
    source  => '/vagrant/puppet/modules/apache-server/files/virtual-host',
  }

  exec { 'apache2-change-user':
    require => Package['apache2'],
    command => '/bin/sed -i "s/www-data/vagrant/g" /etc/apache2/envvars && /bin/chown vagrant:vagrant /var/lock/apache2',
  }
}
