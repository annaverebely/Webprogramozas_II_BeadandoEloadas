<x-mainpage title="React – Árak">
  {{-- data-admin: a React ebből tudja, hogy megjelenítse-e az űrlapot és a gombokat --}}
  <div id="react-arak" data-admin="{{ Auth::user()?->role == 1 ? '1' : '0' }}">
    <noscript>Az oldal használatához engedélyezze a JavaScriptet.</noscript>
  </div>

  @viteReactRefresh
  @vite('resources/js/react-arak/main.tsx')
</x-mainpage>
