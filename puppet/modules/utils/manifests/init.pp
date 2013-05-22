class utils {

  package { 'vim':
    ensure => 'present',
  }

  package { 'htop':
    ensure => 'present',
  }

}