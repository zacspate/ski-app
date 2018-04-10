INSERT INTO Racer(run2time)
VALUES('".$_POST["fruntime"]."')
WHERE bibNumber = '".$_POST["fbib"]."'
AND level = '".$_POST["flevel"]."'
AND race = '".$_POST["frace"]."';