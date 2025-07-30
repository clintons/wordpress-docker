# wordpress-docker
Wordpress running in Docker Desktop (windows)

Use Grok or Claude AI or (favorite) if you need help with additional configuration depending on your environment. 
I'm running wordpress in a dockr container using Docker Desktop on Windows 11.
Nginx is my server of choice. Apache is supposed to be easier but I had challenges with Apache and windows networking in my first attempt.

ports:
      - "8083:80" (select an unused port on your platform)

I found that localhost:8083 doesn't work because my container is setup for http: and Chrome requires https: 
I abandoned the idea of using localhost to view the site. I use Cloudflare to provide https: administration and DNS and their
cloudflared secure socket Tunnel to help with isolation security for my server. They provide the necessary Tunnel Token.

Place all files in a c:/Users/someuser folder. Open CMD in Windows and cd to c:/Users/someuser

docker-compose pull
docker-compose up -d
