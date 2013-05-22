class php54 {

	package { "python-software-properties":
    require => Exec['update-packages'],
    ensure => present,
  }

  exec { 'php54-repo':
    require => Package['python-software-properties'],
    command => '/usr/bin/add-apt-repository ppa:ondrej/php5 -y',
  }

  exec { 'php54-repo-update-packages':
		require => Exec['php54-repo'],
		command => '/usr/bin/apt-get update',
	}

}