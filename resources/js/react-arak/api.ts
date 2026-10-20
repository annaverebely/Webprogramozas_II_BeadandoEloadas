import axios from 'axios';

// Axios-példány a Laravel JSON API-hoz (/api/...).
// - Accept: application/json → a Laravel hiba esetén (pl. validáció) is JSON-t küld vissza, nem HTML-oldalt
// - a CSRF-védelemhez szükséges X-XSRF-TOKEN fejlécet az Axios magától küldi az XSRF-TOKEN sütiből
export const api = axios.create({
    baseURL: '/api',
    headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
});

// Egy ár, ahogy a szerver (ArApiController) visszaadja
export interface Ar {
    id: number;
    suti_id: number;
    suti_nev: string | null;
    ertek: number;
    egyseg: string;
}

// Egy sütemény a legördülő listához
export interface Suti {
    id: number;
    nev: string;
    tipus: string;
}
