# Creating a certificate authority
`openssl genrsa -des3 -out myCA.key 2048`

`openssl req -x509 -new -nodes -key myCA.key -sha256 -days 1825 -out myCA.pem`

# Creating a local ssl cert
`openssl genrsa -out dev.thehardylawfirm.com.key 2048`

`openssl req -new -key dev.thehardylawfirm.com.key -out dev.thehardylawfirm.com.csr`

`openssl x509 -req -in dev.thehardylawfirm.com.csr -CA myCA.pem -CAkey myCA.key -CAcreateserial \
-out dev.thehardylawfirm.com.crt -days 365 -sha256 -extfile dev.thehardylawfirm.com.ext`