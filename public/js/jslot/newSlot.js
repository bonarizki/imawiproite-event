class newSlot {

    constructor() {
        
        this.isSpinning = false;
        this.spinSpeed = 0;
        this.winCount = 0;
        this.doneCount = 0;
    
        this.$liHeight = 0;
        this.$liWidth = 0;
    
        this.winners = [];
        this.allSlots = [];
        this.totalslot = [];
        this.arrTemp = [];
    }
    

    setup = () => {


        var $list = base.$el;
        var $li = $list.find('li').first();

        this.$liHeight = $li.outerHeight();
        this.$liWidth = $li.outerWidth();

        base.liCount = base.$el.children().length;

        base.listHeight = base.$liHeight * base.liCount;

        base.increment = (base.options.time / base.options.loops) / base.options.loops;

        $list.css('position', 'relative');

        $li.clone().appendTo($list);

        base.$wrapper = $list.wrap('<div class="jSlots-wrapper"></div>').parent();

        // remove original, so it can be recreated as a Slot
        base.$el.remove();

        if (base.totalslot.length == 0) {
            // clone lists
            for (var i = base.options.number - 1; i >= 0; i--){
                base.allSlots.push( new base.Slot() );
                base.totalslot.push(base.allSlots);
            }
        }
        

        console.log(base.options.number)
        console.log(base.totalslot.length);

    };
    
    
}