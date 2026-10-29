import axios from 'axios';


export const api = axios.create({
    baseURL: '/api',
    headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
});

// szerver (ArApiController) által visszaadott ár
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
