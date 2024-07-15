# Visualization Mail (V-Mail)
V-Mail is  a framework of cross-platform applications, interactive techniques, and communication protocols for improved multi-person correspondence about spatial 3D datasets. Please check out our paper:

Jung Who Nam, Tobias Isenberg, and Daniel F. Keefe. V-Mail: 3D-Enabled Correspondence about Spatial Data on (Almost) All Your Devices. IEEE Transactions on Visualization and Computer Graphics, 30(4):1853–1867, April 2024. doi: [10.1109/TVCG.2022.3229017](https://doi.org/10.1109/TVCG.2022.3229017). An open access paper version is [available on HAL](https://hal.science/hal-03924707).

If you use the code in this repository we would appreciate a citation of our paper.

## Bibtex
```
@article{Nam:2024:V3C,
  author      = {Nam, Jung Who and Tobias Isenberg and Daniel F. Keefe},
  title       = {{V}-{M}ail: {3D}-Enabled Correspondence about Spatial Data on (Almost) All Your Devices},
  journal     = {IEEE Transactions on Visualization and Computer Graphics},
  year        = {2024},
  volume      = {30},
  number      = {4},
  month       = apr,
  pages       = {1853--1867},
  doi         = {10.1109/TVCG.2022.3229017},
  shortdoi    = {10/kt43},
  doi_url     = {https://doi.org/10.1109/TVCG.2022.3229017},
  oa_hal_url  = {https://hal.science/hal-03924707},
  osf_url     = {https://osf.io/qehvs/},
  url         = {https://www.sculpting-vis.org/VMail.html},
  github_url  = {https://github.com/JungWhoNam/VisualizationMail},
  github_url2 = {https://github.com/JungWhoNam/VisualizationMailServer},
  github_url3 = {https://github.com/JungWhoNam/BrainTensorVis/tree/vmail},
  video       = {https://youtu.be/SCTlARovRBY},
}
```

## Related GitHub Repos
* PC/Mac, Android V-Mail Clients
    * https://github.com/JungWhoNam/VisualizationMail
* V-Mail Server (this current repo)
    * https://github.com/JungWhoNam/VisualizationMailServer
<!-- * Integration to a data visualization application
    * https://github.com/JungWhoNam/BrainTensorVis/tree/vmail -->

# Visualization Mail (V-Mail) Server
The server is composed of a MySQL Database and a file storage. PHP scripts in this repo handles server-side scripting. 

## Run the server application
The easiest way to run this application is using [the docker image](https://github.com/mattrayner/docker-lamp), which provides resources for running LAMP (Linux, Apache, MySQL, and PHP) applications. This project is already structured to work with the docker container.
* PHP files are placed under `app`.
* `mysql/` folder is there to make the SQL persistent.
* `run` starts the server using the docker image.

Steps to run this application:
1. Install [docker](https://www.docker.com/get-started/)
2. Clone this repo
3. Run the script `run`
4. Create `vmails` database and `vmails` table (see the next section)
5. *(Optional)* Specify your db configurations in `app/ConnectionSettings.php`

> `app/phpinfo.php` is provided for a simple test. Type `http://localhost/phpinfo.php` in your browser to see if the server is working.

## MySQL Specifications
The table is composed of five fields, and `ID` is an auto-increment primary key field in the db.
![Alt text](images/db_structure.png)

Here are example entires.
![Alt text](images/db_entries.png)

Or use ``app/create_vmails_table.sql``, a SQL dump file, to create the table.

```
# create `vmails` table in `vmails` database
mysql vmails < /app/create_vmails_table.sql
```
