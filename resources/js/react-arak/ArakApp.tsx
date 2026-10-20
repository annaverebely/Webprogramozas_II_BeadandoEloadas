import { isAxiosError } from 'axios';
import { useEffect, useMemo, useState } from 'react';
import ArForm, { type ArAdat, type Hibak } from './ArForm';
import { api, type Ar, type Suti } from './api';


export default function ArakApp({ admin }: { admin: boolean }) {
    const [arak, setArak] = useState<Ar[]>([]);
    const [sutik, setSutik] = useState<Suti[]>([]);
    const [betolt, setBetolt] = useState(true);
    const [hiba, setHiba] = useState<string | null>(null);
    const [kereses, setKereses] = useState('');

    
    const [urlapNyitva, setUrlapNyitva] = useState(false);
    const [szerkesztett, setSzerkesztett] = useState<Ar | null>(null);
    const [hibak, setHibak] = useState<Hibak>({});
    const [mentes, setMentes] = useState(false);
    const [uzenet, setUzenet] = useState<string | null>(null);

    useEffect(() => {
       
        Promise.all([api.get<Ar[]>('/arak'), api.get<Suti[]>('/sutik')])
            .then(([arValasz, sutiValasz]) => {
                setArak(arValasz.data);
                setSutik(sutiValasz.data);
            })
            .catch(() => setHiba('Az árak betöltése nem sikerült.'))
            .finally(() => setBetolt(false));
    }, []);

    
    useEffect(() => {
        if (!uzenet) return;
        const idozito = setTimeout(() => setUzenet(null), 4000);
        return () => clearTimeout(idozito);
    }, [uzenet]);

    //keresés név alapján
    const lathato = useMemo(
        () => arak.filter((ar) => (ar.suti_nev ?? '').toLowerCase().includes(kereses.toLowerCase())),
        [arak, kereses],
    );

    const urlapMegnyitasa = (ar: Ar | null) => {
        setSzerkesztett(ar);
        setHibak({});
        setUrlapNyitva(true);
        window.scrollTo({ top: document.getElementById('react-arak')!.offsetTop - 120, behavior: 'smooth' });
    };

    // Create / Update
    const mentesKezelo = async (adat: ArAdat) => {
        setMentes(true);
        setHibak({});
        const kuldott = { suti_id: Number(adat.suti_id) || null, ertek: Number(adat.ertek) || null, egyseg: adat.egyseg };
        try {
            if (szerkesztett) {
                const { data } = await api.put<Ar>(`/arak/${szerkesztett.id}`, kuldott);
               
                setArak((lista) => lista.map((ar) => (ar.id === data.id ? data : ar)));
                setUzenet(`A(z) „${data.suti_nev}” ára módosult.`);
            } else {
                const { data } = await api.post<Ar>('/arak', kuldott);
                setArak((lista) => [...lista, data]);
                setUzenet(`Új ár felvéve: ${data.suti_nev}, ${data.ertek.toLocaleString('hu-HU')} Ft / ${data.egyseg}.`);
            }
            setUrlapNyitva(false);
        } catch (e) {
            
            if (isAxiosError(e) && e.response?.status === 422) setHibak(e.response.data.errors);
            else setHiba('A mentés nem sikerült.');
        } finally {
            setMentes(false);
        }
    };

    // Delete
    const torles = async (ar: Ar) => {
        if (!confirm(`Biztosan törli ezt az árat: ${ar.suti_nev}, ${ar.ertek.toLocaleString('hu-HU')} Ft / ${ar.egyseg}?`)) return;
        try {
            await api.delete(`/arak/${ar.id}`);
            setArak((lista) => lista.filter((x) => x.id !== ar.id));
            setUzenet(`Az ár törölve: ${ar.suti_nev}, ${ar.egyseg}.`);
        } catch {
            setHiba('A törlés nem sikerült.');
        }
    };

    if (betolt) return <p className="text-center py-5"><span className="spinner-border text-primary" /> Betöltés…</p>;

    return (
        <>
            <div className="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 className="text-uppercase m-0">Sütemények árai</h2>
                <div className="d-flex gap-2">
                    <input
                        type="search"
                        className="form-control w-auto"
                        placeholder="Keresés sütemény szerint…"
                        value={kereses}
                        onChange={(e) => setKereses(e.target.value)}
                    />
                    {admin && !urlapNyitva && (
                        <button className="btn btn-primary border-inner px-4" onClick={() => urlapMegnyitasa(null)}>
                            <i className="fa fa-plus me-2" />Új ár
                        </button>
                    )}
                </div>
            </div>

            {uzenet && <div className="alert alert-success">{uzenet}</div>}
            {hiba && <div className="alert alert-danger">{hiba}</div>}

            {admin && urlapNyitva && (
                <ArForm
                    key={szerkesztett?.id ?? 'uj'}
                    sutik={sutik}
                    szerkesztett={szerkesztett}
                    hibak={hibak}
                    mentes={mentes}
                    onMentes={mentesKezelo}
                    onMegse={() => setUrlapNyitva(false)}
                />
            )}

            <div className="table-responsive">
                <table className="table table-striped table-hover align-middle">
                    <thead className="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Sütemény</th>
                            <th className="text-end">Ár</th>
                            <th>Egység</th>
                            {admin && <th className="text-center">Műveletek</th>}
                        </tr>
                    </thead>
                    <tbody>
                        {lathato.map((ar) => (
                            <tr key={ar.id} className={szerkesztett?.id === ar.id && urlapNyitva ? 'table-warning' : ''}>
                                <td>{ar.id}</td>
                                <td className="fw-bold">{ar.suti_nev}</td>
                                <td className="text-end">{ar.ertek.toLocaleString('hu-HU')} Ft</td>
                                <td>{ar.egyseg}</td>
                                {admin && (
                                    <td className="text-center text-nowrap">
                                        <button className="btn btn-sm btn-dark me-1" onClick={() => urlapMegnyitasa(ar)}>
                                            <i className="fa fa-pen me-1" />Szerkesztés
                                        </button>
                                        <button className="btn btn-sm btn-danger" onClick={() => torles(ar)}>
                                            <i className="fa fa-trash me-1" />Törlés
                                        </button>
                                    </td>
                                )}
                            </tr>
                        ))}
                        {lathato.length === 0 && (
                            <tr><td colSpan={admin ? 5 : 4} className="text-center text-muted py-4">Nincs találat.</td></tr>
                        )}
                    </tbody>
                </table>
            </div>
            <p className="text-muted small">{lathato.length} / {arak.length} ár</p>
        </>
    );
}
