SELECT
    g.registration_date,
    g.recovery_value,
    g.salvage_value,
    g.total_reservation,
    g.others_expenses_reservation,
    g.legal_fees,
    g.fee_reservation,
    g.value_fees,
    g.id_crs_acta,
    g.num_claim,
    g.id_risk_type,
    r.name_risk_ES tipo_riesgo,
    c.NOMBRE asegurado,
    g.id_policy,
    s.nombre_local nombre_local,
    s.no_policy_umr no_policy_umr,
    s.fecha_inicio_slip,
    s.fecha_final_slip,
    c.id_pais,
    p.name_ES pais,
    l.nombre_ES lob,
    g.id_merchandise_type,
    m.nombre_mercancia_ES mercancia,
    g.id_claim_status,
    ec.nombre_ES estado,
    g.id_claim_sub_status,
    se.nombre_ES subestado,
    g.total_reservation reservaTotal,
    pc.operation_performed_ES operation_performed,
    g.id_insurance aseguradora,
    g.notice_date,
    g.description_claim_ES description,
    g.adjuster_name
FROM
    sistema_crs_general g
    LEFT JOIN sistema_crs_risk_type r ON g.id_risk_type = r.id_risk_type
    LEFT JOIN clientes c ON g.id_assured = c.CODI_CLIE
    LEFT JOIN city city ON c.id_ciudad = city.ID
    LEFT JOIN slip s ON g.id_policy = s.id_slip
    LEFT JOIN country p ON c.id_pais = p.code
    LEFT JOIN relacion_slip_asegurador rs ON rs.id_slip = s.id_slip
    LEFT JOIN sistema_brx_lob l ON s.tipo_de_poliza = l.id_lob
    LEFT JOIN sistema_mercancia m ON g.id_merchandise_type = m.id_mercancia
    LEFT JOIN sistema_crs_estado_siniestro_confirmado ec ON g.id_claim_status = ec.id_estado
    LEFT JOIN sistema_crs_subestados se ON g.id_claim_sub_status = se.id_sub_estado
    LEFT JOIN asegu a ON a.CODI_ASEGU = g.id_insurance
    LEFT JOIN sistema_crs_probable_cause pc ON pc.id_probable_cause = g.id_type_probable_cause
    LEFT JOIN relacion_slip_reasegurador rea ON g.id_policy = rea.id_slip
    JOIN sistema_brx_vigencia_binder b ON b.id_vigencia_binder = rea.id_vigencia_binder
    AND g.id_policy = rea.id_slip
WHERE
    p.code = 'ARG'
    AND rea.participacion_ccuw = 1
GROUP BY
    g.id_crs_acta
ORDER BY
    g.date_creation DESC
LIMIT
    5