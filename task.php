<?php




if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: welcome.php");
    exit;
 
}

?>

<div class="col2">
                    <div class="task" id="task">
                        <h2>Todays Task 🔥</h2>
                        <hr>

               

                        <div id="taskpopup" class="popup">
                            <h3>Add Task</h3>
                            <form id="taskForm" method="post" action="index.php">
                                <input type="text" name="task" placeholder="Enter new task">
                                <button type="submit" id="addbutton" >Add</button>
                                <button type="button" id="cancleicon" onclick="closePopup(taskpopup)"><i id="plusicon" class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>




                                <ul>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <li <?php if($row['completed']) echo 'style="text-decoration: line-through;"'; ?>>
                                        <?php echo $row['task']; ?>
                                        <?php if(!$row['completed']): ?>
                                            <a  id="donebutton" href="?complete=<?php echo $row['id']; ?>">   <i class="fa-solid fa-check"></i></a>
                                        <?php endif; ?>
                                        <a id="deletebutton" href="?delete=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                                    </li>
                                
                                <?php endwhile; ?>
                            </ul>



                            <button id="add" onclick="openPopup(taskpopup)"><i id="plusicon" class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
