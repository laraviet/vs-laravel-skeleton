<VirtualHost *:{{ Arr::get($config, 'ports.http', 80) }}>
    DocumentRoot "{{ public_path() }}"
    ServerName {{ $hostname->fqdn }}
    ServerAlias {{ '*.' . $hostname->fqdn }}
</VirtualHost>
