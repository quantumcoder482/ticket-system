$(document).ready(function(){
    // init Debug window
    $.debug.init(true);
    // 加入自訂 Command
    $.debug.addCmd(
        {
            tag : "hello", // 這是命令的語法 (就一個單字 XD )
            info : "Just to say hi", // 這是給人類看的命令簡介.
            fn : function(){ $.debug.log("Oh. hi there."); } // 這當然是功能啊!!!
        },
        {
            tag : "warn me",
            info : "A warning line.",
            fn : function(){ $.debug.warning("Warning line."); }
        });
    $.debug.toggleByKey(true,false,false,192);
    $.debug.resizeByKey(true,false,true,192);
    $.debug.show();
    $.debug.log("What can I help you.");
    $.debug.warning("Try to type something here.");
});