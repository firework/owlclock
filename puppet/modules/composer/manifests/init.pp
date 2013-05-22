class composer {

  exec { 'install-composer':
    require => Package['curl', 'php5-cli'],
    command => '/usr/bin/curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin',
  }

}