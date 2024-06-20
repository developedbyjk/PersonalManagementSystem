<div class="col3">

                    <div class="time">
                        <div>
                            <h5>Monday</h5>
                            <h1>

                            <?php
                            echo date("h:i A");
                            ?>
                           
                            </h1>
                            <h5><?php echo date("d/m/Y")  ?></h5>
                        </div>
                    </div>

                    <div class="bookmarks">
                        <!-- <h4>Bookmarks</h4> -->
                        <!-- <a href="">Study Material</a>
                        <br><br>    
                        <a href="">Youtube Stuff</a> -->
                        <?php while($row = $bookresult->fetch_assoc()): ?>
                          
                     
                            <!-- <?php echo $row['bookmark_title']; ?> -->
                          


                           <div class="makebookmarflex">
                                <a id="styleforbookmarlink" href="<?php echo $row['bookmark_link'] ?>" target="_blank" ><?php echo $row['bookmark_title']; ?></a>
                                <a id="deletebookmarlink" href="?deletebookmarid=<?php echo $row['id']; ?>" >  <i class="fa-regular fa-trash-can"></i> </a>
                           </div> 



                           
                          

                    
                
                  
                     

                            <br/>
                        
                        <?php endwhile; ?>

                        <!-- <button  onclick="openPopup(bookmark)">
                                Add bookmark 
                        </button>   -->
                        <button id="add" onclick="openPopup(bookmark)"><i id="plusicon" class="fa-solid fa-plus"></i></button>

                        <div id="bookmark" class="popup">
                            <h3  >Add bookmark</h3>
                             
                                    <form id="bookmarkForm" method="post" action="index.php">
                                        <input type="text" name="bookmark_title" placeholder="Enter title">
                                         <input type="text" name="bookmark_link" placeholder="Enter link">
                                        <button type="submit" id="addbutton">Add</button>
                                        <button type="button" id="cancleicon" onclick="closePopup(bookmark)"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                               
                        </div>

                        </div>
                            <div class="box">
                                    <form action="logout.php" method="post">
                                
                                    <input type="submit" value="Logout 🌃">
                                    
                                    
                                    </form>
                            </div>
                </div>

    