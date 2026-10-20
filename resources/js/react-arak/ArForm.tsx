import { useState, type FormEvent } from 'react';
import type { Ar, Suti } from './api';

// Az űrlap mezői
export interface ArAdat {
    suti_id: string;
    ertek: string;
    egyseg: string;
}


export type Hibak = Partial<Record<keyof ArAdat, string[]>>;

interface Props {
    sutik: Suti[];
    szerkesztett: Ar | null; // null = új ár
    hibak: Hibak;
    mentes: boolean; // folyamatban van-e a mentés
    onMentes: (adat: ArAdat) => void;
    onMegse: () => void;
}

const EGYSEGEK = ['db', '8 szeletes', '12 szeletes', '16 szeletes', '24 szeletes', 'kg', '20 dkg', 'rúd', 'koszorú'];

// Új ár felvétele vagy meglévő szerkesztése
export default function ArForm({ sutik, szerkesztett, hibak, mentes, onMentes, onMegse }: Props) {
    const [adat, setAdat] = useState<ArAdat>({
        suti_id: szerkesztett ? String(szerkesztett.suti_id) : '',
        ertek: szerkesztett ? String(szerkesztett.ertek) : '',
        egyseg: szerkesztett?.egyseg ?? 'db',
    });

    const mezo = (nev: keyof ArAdat) => (e: { target: { value: string } }) => setAdat({ ...adat, [nev]: e.target.value });
    const hibaOsztaly = (nev: keyof ArAdat) => (hibak[nev] ? 'form-control is-invalid' : 'form-control');

    
    const kuldes = (e: FormEvent) => {
        e.preventDefault();
        onMentes(adat);
    };

    return (
        <form onSubmit={kuldes} className="bg-secondary border-inner p-4 mb-4" noValidate>
            <h4 className="mb-3">{szerkesztett ? `Ár szerkesztése (ID: ${szerkesztett.id})` : 'Új ár felvétele'}</h4>
            <div className="row g-3">
                <div className="col-md-5">
                    <label className="form-label fw-bold" htmlFor="suti_id">Sütemény *</label>
                    <select id="suti_id" className={hibaOsztaly('suti_id').replace('form-control', 'form-select')} value={adat.suti_id} onChange={mezo('suti_id')}>
                        <option value="">– válasszon –</option>
                        {sutik.map((s) => (
                            <option key={s.id} value={s.id}>{s.nev} ({s.tipus})</option>
                        ))}
                    </select>
                    {hibak.suti_id && <div className="invalid-feedback">{hibak.suti_id[0]}</div>}
                </div>
                <div className="col-md-3">
                    <label className="form-label fw-bold" htmlFor="ertek">Ár (Ft) *</label>
                    <input id="ertek" type="number" min="1" className={hibaOsztaly('ertek')} value={adat.ertek} onChange={mezo('ertek')} />
                    {hibak.ertek && <div className="invalid-feedback">{hibak.ertek[0]}</div>}
                </div>
                <div className="col-md-4">
                    <label className="form-label fw-bold" htmlFor="egyseg">Egység *</label>
                    <input id="egyseg" list="egysegek" className={hibaOsztaly('egyseg')} value={adat.egyseg} onChange={mezo('egyseg')} />
                    <datalist id="egysegek">
                        {EGYSEGEK.map((e) => <option key={e} value={e} />)}
                    </datalist>
                    {hibak.egyseg && <div className="invalid-feedback">{hibak.egyseg[0]}</div>}
                </div>
            </div>
            <div className="d-flex justify-content-end gap-2 mt-4">
                <button type="button" className="btn btn-outline-dark" onClick={onMegse}>Mégse</button>
                <button type="submit" className="btn btn-primary px-4" disabled={mentes}>
                    {mentes ? 'Mentés…' : szerkesztett ? 'Módosítás mentése' : 'Mentés'}
                </button>
            </div>
        </form>
    );
}
