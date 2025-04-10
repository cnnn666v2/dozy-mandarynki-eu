<footer>
    <h1>Cnnn666 (or Dozy)</h1>
    <h5 class="mb-2 font-bold">Copyright (C) 2024 - 2025</h5>

    <div class="flex flex-row gap-5 mt-5">
        <div class="flex flex-col bg-slate-800 rounded-lg p-4 flex-1">
            <h2 class="uppercase font-semibold">mandarynki.eu</h2>
            <p>· <a href="https://mandarynki.eu">Homepage</a></p>
            <p>· <a href="https://paste.mandarynki.eu">PrivateBin</a></p>
            <p>· <a href="https://uptime.mandarynki.eu/status/mandarynki">Status</a></p>
            <p>· <a href="https://mandarynki.eu/doku.php?id=en:rules:terms_of_service">Terms of Service</a></p>
        </div>

        <div class="flex flex-col bg-slate-800 rounded-lg p-4 flex-1">
            <h2 class="uppercase font-semibold">Social Media</h2>
            <p>· <a href="https://mandarynki.eu">YouTube</a></p>
            <p>· <a href="https://mandarynki.eu">BlueSky</a></p>
            <p>· <a href="https://mandarynki.eu">Fediverse</a></p>
        </div>

        <div class="flex flex-col bg-slate-800 rounded-lg p-4 flex-1">
            <h2 class="uppercase font-semibold">My profiles</h2>
            <p>· <a href="https://mandarynki.eu">About me</a></p>
            <p>· <a href="https://mandarynki.eu">Github</a></p>
            <p>· <a href="https://mandarynki.eu">Steam</a></p>
            <p>· <a href="https://mandarynki.eu">Steam 2</a></p>
        </div>

        <div class="flex flex-col bg-slate-800 rounded-lg p-4 flex-1">
            <h2 class="uppercase font-semibold">Contact</h2>
            <p>· Email: <span class="text-base">dozy@mandarynki.eu</span></p>
            <p>· Discord: <span class="text-base">@Cnnn666 // Cnnn666#5460</span></p>
            <p>· BlueSky: <span class="text-base">@cnnn666.mandarynki.eu</span></p>
        </div>
    </div>

    <div class="flex flex-row w-full mt-5">
        <h5>Built with ❤️ and Tailwind CSS · <a href="https://github.com/cnnn666v2/dozy-mandarynki-eu">Website's Repository</a></h5>
        <h5 id="version-txt" class="ml-auto">Version: beta1</h5>
    </div>
    <script src="/js/footer.js"></script>
</footer>

<?php
$end_time = microtime(true);
$render_time = $end_time - $start_time;
printf('<p class="text-xs">Page rendered in %.3f seconds. | Start: '.$start_time.' | End: '.$end_time.'</p>', $render_time);
?>