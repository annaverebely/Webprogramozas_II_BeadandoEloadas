import { createRoot } from 'react-dom/client';
import ArakApp from './ArakApp';

// A React belépési pont

const gyoker = document.getElementById('react-arak');

if (gyoker) {
    createRoot(gyoker).render(<ArakApp />);
}
