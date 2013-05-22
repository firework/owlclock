class php {

  package { 'php5':
    require => Exec['php54-repo-update-packages'],
    ensure => 'present',
  }

  package { 'php5-cli':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-curl':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-dev':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-gd':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-mcrypt':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-mysql':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php5-xdebug':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php-apc':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'php-pear':
    require => Package['php5'],
    ensure => 'present',
  }

  package { 'libapache2-mod-php5':
    require => Package['apache2', 'php5'],
    ensure  => 'present',
  }

  # Upgrade PEAR, install PHPUnit.
  exec { 'pear-upgrade':
    require => Package['php-pear'],
    command => '/usr/bin/pear upgrade',

    # TRICKY:
    # PEAR returns null if there is nothing to upgrade, which Puppet
    # misinterprets as an error. We set the possible return values.
    #
    # @see http://blog.code4hire.com/2013/01/pear-packages-installation-under-vagrant-with-puppet/
    returns => [0, '', ' '],
  }

  exec { 'pear-autodiscover':
    require => Exec['pear-upgrade'],
    command => '/usr/bin/pear config-set auto_discover 1',
  }

  exec { 'pear-update-channels':
    require => Exec['pear-autodiscover'],
    command => '/usr/bin/pear update-channels',
  }

  exec { 'install-phpunit':
    require => Exec['pear-update-channels'],
    command => '/usr/bin/pear install pear.phpunit.de/PHPUnit',

    # Very important. Prevents an error if PHPUnit is already installed.
    creates => '/usr/bin/phpunit',
  }

}