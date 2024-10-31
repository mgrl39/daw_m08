<?php

require_once "DatabaseController.php";

class ProjectController {

    private $connection;

    public function __construct() {
        $this->connection = DatabaseController::connect();
    }

    public function getProjects() {

        try  {
       
            $sql = "SELECT * 
                    FROM Project
                    WHERE 1";
        
            $statement = $this->connection->prepare($sql);
            //$statement->setFetchMode(PDO::FETCH_INTO, new stdClass);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;

          } catch(PDOException $error) {
              echo $sql . "<br>" . $error->getMessage();
          }
    }
    public function getTechnologiesByProject($projectId) {
        try {
            $sql = "SELECT t.* FROM Technology t 
                    JOIN ProjectTechnology pt ON t.id = pt.technologyId 
                    WHERE pt.projectId = :projectId";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $error) {
            echo $error->getMessage();
            return [];
        }
    }
}
