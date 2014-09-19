phpDirectory Operation
=======================
This script is to get tree files and folder of a path fo directory

## Uses
##### Get all sub folder form 'test' folder
$generalRoutes = new DirectoryObj(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR.'test');
foreach($generalRoutes->getFiles() as $route)
{
    echo $route['path'];
}

##### Get each files from 'test' folder
$robotRoutes = $robotObj->getFiles($robot['path'].'/test');
foreach($robotRoutes as $robotRoute)
{
    echo $robotRoute['path'];
}


## Note
- Each function return a array with include files information such as file/folder  name and file/folder actual path
- Here dirname(dirname(__FILE__)) can be replace $_SERVER array path of a directory in host