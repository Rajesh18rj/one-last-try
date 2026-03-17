<!-- 🎉 Celebration Confetti -->
<canvas id="confetti-canvas"
        class="fixed inset-0 pointer-events-none z-50">
</canvas>

<style>
    #confetti-canvas{
        width:100%;
        height:100%;
    }
</style>

<script src="{{ asset('js/result/confetti.js') }}"></script>

<script>
    window.assessmentLevel = @json($level);
</script>
