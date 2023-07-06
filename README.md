# Visualization Mail (V-Mail)
V-Mail is  a framework of cross-platform applications, interactive techniques, and communication protocols for improved multi-person correspondence about spatial 3D datasets. Please check our paper: <em>V-Mail: 3D-Enabled Correspondence about Spatial Data on (Almost) All Your Devices  (https://doi.org/10.1109/TVCG.2022.3229017).</em>

## Related GitHub Repos
* PC/Mac, Android V-Mail Clients
    * https://github.com/JungWhoNam/VisualizationMail
* V-Mail Server
    * https://github.com/JungWhoNam/VisualizationMailServer
* Integration to a data visualization application
    * https://github.com/JungWhoNam/BrainTensorVis/tree/vmail

# Visualization Mail (V-Mail) Server
The server is composed of a SQL Database and a file storage. PHP scripts in this repo handles server-side scripting. 

## PHP scripts (Version 7.2)
Specify your db configurations in `ConnectionSettings.php`. [`VMail/_Scripts/Servers_Php/WebIntegration.cs`](https://github.com/JungWhoNam/VisualizationMail/blob/master/Assets/VMail/_Scripts/Servers_php/WebIntegration.cs) in the client makes web requests.

## DB Specifications
The db is composed of five fields, and `ID` is an auto-increment primary key field in the db.
![Alt text](images/db_structure.png)

Here are example entires.
![Alt text](images/db_entries.png)