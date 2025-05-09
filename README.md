

# CS 4347 Project 
## Project Name: Lemma Books

```
# Application logic:
    - app/src

# Database location:
    - database

# Docker dependent files:
    - docker-compose.yml
    - nginx
    - php
    - data

# SQL injection assignment:
    - Assignment 6

```
## Installation instructions

Windows: 

- Use [Docker Windows](https://docs.docker.com/desktop/setup/install/windows-install/)
- Run the installer and follow the setup instructions.
- During installation, **enable WSL 2** if asked (recommended for Windows 10/11).
- After installation, start Docker Desktop.


Linux: 

- Use [Docker Linux](https://docs.docker.com/compose/install/linux/)
- After install, run `docker compose up -d` in the root directory.

Linux detailed:
1. Set up Docker's apt repository.


```
    # Add Docker's official GPG key:
    sudo apt-get update
    sudo apt-get install ca-certificates curl
    sudo install -m 0755 -d /etc/apt/keyrings
    sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
    sudo chmod a+r /etc/apt/keyrings/docker.asc

    # Add the repository to Apt sources:
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
      $(. /etc/os-release && echo "${UBUNTU_CODENAME:-$VERSION_CODENAME}") stable" | \
      sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
```
2. To install the latest version, run: 

`sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin`

3. Verify that the installation is successful by running the hello-world image:

`sudo docker run hello-world`
# Assignment 6: SQL Injection

## A. SELECT

On the Login form of `auth.php`, to login under the username `awilley2`, input `awilley2' OR 1=1 #` in the username field and anything in the password field. This allows you to log in as the user and see additional information about them (name and email).

## B. UPDATE

On the Forgot Password form of `auth.php`, to change the password of the user `awilley2` without knowing their email, input `' OR username = 'awilley2' #` and the desired password in the password field. This resets the password, and you can now log in with the new password on the login page (and see the change reflected in the database).

## C. Prepared Statement Technique

Try the trick from part (A) on the `auth_safe.php` instead - it no longer works.
