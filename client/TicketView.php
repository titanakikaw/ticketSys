<?php require('./index.php');

?>
<div class="main-container single-ticket">
    <div class="sub-container" style="display: flex;">
        <div class="sub-container-one" style="width: 60%; margin-right:10px;">
            <div class="container" style="margin-top:10px;">
                <div class="" style="display: flex;justify-content:space-between">
                    <p class="ptitle" style="font-size: 11px;">Ticket Number: 123456</p>
                    <p class="ptitle" style="font-size: 10px;">Date: December 1, 2001</p>
                </div>
                <hr>
                <p class="ptitle" style="font-size: 10px;font-weight:normal;">Author: Sample User</p>
                <p class="ptitle" style="font-size: 10px;font-weight:normal;">Department: Sample Department</p>
                <p class="ptitle" style="font-size: 10px;font-weight:normal;">Priority: High</p>
                <p class="ptitle" style="font-size: 10px;font-weight:normal;">status: Pending</p>
                <p class="ptitle" style="font-size: 10px;font-weight:normal;">Subject: <b>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</b></p>
                <hr>

                <p class="ptitle" style="font-size: 10px;font-weight:normal;">Details:</p>
                <textarea name="details" id="" cols="30" rows="10" style="max-height:400px;width:100%; max-width:100%; font-size: 10px;padding: 5px;"></textarea>
                <div class="ticket-actions" style="display: flex; justify-content:space-between;margin-top:1rem">
                    <input type="button" value="Mark as Done" style="margin: 0 5px; background-color:green; color:white">
                    <input type="button" value="Cancel Ticket" style="margin: 0 5px;background-color:rgb(225, 63, 63); color:white">
                    <input type="button" value="For Review" style="margin: 0 5px; background-color:#2f9ef8">
                </div>

            </div>
        </div>
        <div class="sub-container-two" style="flex-grow:1; max-width:422.406px;">
            <div class="container" style="margin-top:10px; ">
                <p class="ptitle">Ticket Files</p>
                <hr>
                <div class="files-container" style="display: flex; align-items:center;padding-top:3px;">
                    <div class="file-container" style="border: 2px solid green; height:45px; width: 35px;border-radius:2px;display:flex;align-items:center; justify-content:center;cursor:pointer;margin:0 2px;">
                        <i class="fa-solid fa-file" style="color:green"></i>
                        <!-- <i class="fa-solid fa-file"></i> -->
                    </div>
                    <div class="file-container" style="border: 2px dashed grey; height:45px; width: 35px;border-radius:2px;display:flex;align-items:center; justify-content:center;cursor:pointer;margin:0 2px;">
                        <i class="fa-solid fa-plus" style="color:grey"></i>
                    </div>
                </div>

            </div>
            <div class="container" style="margin-top:10px; ; ">
                <p class="ptitle">Ticket Comments</p>
                <hr>
                <input type="button" value="Add Comment" style="font-size: 10px;font-weight:bold;text-transform:uppercase;margin:5px 0; background-color:#2f9ef8">
                <hr>
                <div class="tcoms-container" style="display: flex; align-items:center;padding-top:3px;flex-direction:column;overflow-y:scroll;height:400px">
                    <div class="com-card tcom" style="margin: 3px 0;">
                        <div class="container">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe repudiandae harum nulla. Labore nostrum iusto consectetur nihil vero tenetur doloremque ullam dignissimos adipisci! Ab ipsam nulla magnam, cumque repellat nemo.</p>
                            <hr>
                            <div class="com-card-sender">
                                <div class="com-card-img">
                                    <img src="">
                                </div>
                                <div class="com-card-info">
                                    <p class="ptitle" style="font-size: 11px;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;font-style:oblique">June 01, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="com-card tcom" style="margin: 3px 0;">
                        <div class="container">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe repudiandae harum nulla. Labore nostrum iusto consectetur nihil vero tenetur doloremque ullam dignissimos adipisci! Ab ipsam nulla magnam, cumque repellat nemo.</p>
                            <hr>
                            <div class="com-card-sender">
                                <div class="com-card-img">
                                    <img src="">
                                </div>
                                <div class="com-card-info">
                                    <p class="ptitle" style="font-size: 11px;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;font-style:oblique">June 01, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="com-card tcom" style="margin: 3px 0;">
                        <div class="container">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe repudiandae harum nulla. Labore nostrum iusto consectetur nihil vero tenetur doloremque ullam dignissimos adipisci! Ab ipsam nulla magnam, cumque repellat nemo.</p>
                            <hr>
                            <div class="com-card-sender">
                                <div class="com-card-img">
                                    <img src="">
                                </div>
                                <div class="com-card-info">
                                    <p class="ptitle" style="font-size: 11px;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;font-style:oblique">June 01, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="com-card tcom" style="margin: 3px 0;">
                        <div class="container">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe repudiandae harum nulla. Labore nostrum iusto consectetur nihil vero tenetur doloremque ullam dignissimos adipisci! Ab ipsam nulla magnam, cumque repellat nemo.</p>
                            <hr>
                            <div class="com-card-sender">
                                <div class="com-card-img">
                                    <img src="">
                                </div>
                                <div class="com-card-info">
                                    <p class="ptitle" style="font-size: 11px;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;">Lorem, ipsum dolor sit amet</p>
                                    <p class="ptitle" style="font-size: 8px;font-weight:normal;font-style:oblique">June 01, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>

    </div>


</div>
<?php require('./footer.php') ?>