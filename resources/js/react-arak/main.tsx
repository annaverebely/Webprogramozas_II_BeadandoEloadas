import { createRoot } from 'react-dom/client';
import ArakApp from './ArakApp';

// A React belépési pont

const gyoker = document.getElementById('react-arak');

if (gyoker) {
    // a Blade-oldal data-admin="1" attribútuma: admin van-e bejelentkezve
    createRoot(gyoker).render(<ArakApp admin={gyoker.dataset.admin === '1'} />);
}
