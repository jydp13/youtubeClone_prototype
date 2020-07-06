            <p>My videos</p><br><hr>
                <table>
                   <tr>
                    <td>
                       <video width="100%" height="100%" controls>
                           <source src="video/<?php echo $_GET['video'];?>" type="video/mp4">
                       </video><br>
                       
                    </td>
                    <td>
                      <table>
                         <tr>
                           <td></td>
                         </tr>
                         <tr>
                           <td>20.8 MB</td>
                         </tr>
                         <tr>
                           <td><a href="video/<?php echo $_GET['video'];?>" download>Download</a></td>
                         </tr>
                      <table>
                     </td>
                    </tr>
                </table>
