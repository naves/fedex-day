
Goal:  Set up a simple and highly scalable noSql platform on AWS

Initial Setup
-------------

1.  set up standard ec2 instance (micro instance -- cheap / free) 
2.  set up EBS volume and attach to instance specific to app
3.  configure ubuntu instance to automatically mount and use ebs volume
4.  configure application specific user and change ownership
5.  update instance to latest patch levels (apt-get update)
6.  build AMI based on micro
7.  launch version on larger instance (small versus micro to get +150GB free (ephemeral))
8.  configure ephemeral disks ( /mnt ) ;; install cassandra & jna
9.  configure init scripts to ensure basics are working / automatically start instance
	- reference template from:  https://github.com/travis-ci/travis-cookbooks/blob/master/ci_environment/cassandra/templates/default/cassandra.init.erb 
10. update apt sources to include additional (to get ec2-api-tools)
	apt-add-repository ppa:awstools-dev/awstools
	apt-get update
	apt-get install ec2-api-tools
11. set up S3 bucket containing static information for cluster
12. configure new security group with application specific rules
13. build AMI based on small -- micro ami no longer required
14. Configure init scripts to automatically retrieve dynamic cluster / instance information based on EC2 Instance tags
	reference information: http://stackoverflow.com/questions/625644/find-out-the-instance-id-from-within-an-ec2-machine
	- wget -q -O - http://169.254.169.254/latest/meta-data/
	
15.  load it up -- deploy (n) instances and see it scale
16.  configure replication factor on Keyspace -- start to kill / destroy instances to show 100% uptime


17.  Integrate other tools like datadog? -- not done.  




--- web server
nginx
php5-fpm
phpcassa - to query cassandra nodes
-- ideally, set up a query mechanism to get a dynamic list from EC2 about available cassandra nodes in region

