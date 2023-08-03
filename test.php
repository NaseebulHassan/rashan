<table class="table">
                                    <tr>
                                        <td>1. Flour 20 kg bag:</td>
                                        <?php
                                          $flourquery="SELECT * from rd_inventory where title='Flour 20kg'";
                                          $runflourquery=mysqli_query($conn,$flourquery);
                                          $flour=mysqli_fetch_array($runflourquery);
                                        ?>
                                        <td><input type="checkbox" name="product" id="" value="<?php echo $flour['id']; ?>"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>2. Ghee 5 kg bag: </td>
                                        <td><input type="checkbox" name="ghee" id=""></td>
                                    </tr>
                                    <tr>
                                        <td> 3. Suger 5 kg bag: </td>
                                        <td><input type="checkbox" name="suger" id=""></td>
                                    </tr>
                                    <tr>
                                        <td>4. Cash 1000 Rupees: </td>
                                        <td><input type="checkbox" name="cash" id=""></td>
                                    </tr>
                                </table>
                        
                              