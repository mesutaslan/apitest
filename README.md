## Secure API with JWT implementation


##### `Author : Mesut Aslan <mesaslan@gmail.com>` 


This project is restful api example.

Demo : http://commercialpeople.pi2data.com

## Installation


$ docker-compose build \
$ docker-compose up -d

## Usage

```yaml
Endpoints

   app_league_listteams       GET      ANY      ANY    /api/leagues/{id}/teams
    app_league_deleteleague    DELETE   ANY      ANY    /api/leagues/{id}
    app_team_modifyteam        PUT      ANY      ANY    /api/team/{id}
    app_team_createteam        POST     ANY      ANY    /api/team
    register                   POST     ANY      ANY    /register
    api                        ANY      ANY      ANY    /api
    login_check                POST     ANY      ANY    /auth/login_check
    login                      POST     ANY      ANY    /auth/login
    token                      POST     ANY      ANY    /create-token
```