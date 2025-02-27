<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\ImageEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\View;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Sapium\FilamentPackageSapiumWawi\Models\WawiSupplier;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
use Sapium\FilamentPackageSapiumWawi\Models\WawiCategories;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages\CreateWawiSupplier;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages\EditWawiSupplier;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages\ListWawiSupplier;

class WawiSupplierResource extends Resource
{

    protected static ?string $model = WawiSupplier::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Product Details')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('supplier_name')
                                ->label('Product Name')
                                ->required(),
                            MarkdownEditor::make('supplier_description')
                                ->label('Product Description'),
                            TextInput::make('phone_number')
                                ->label('Phone Number')
                                ->prefix('+41')
                                ->placeholder('79 123 45 67')
                                ->regex('/^\+41[1-9]{1}[0-9]{8}$/')
                                ->helperText('Enter a valid Swiss phone number, starting with +41'),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->placeholder('max.mustermann@gmail.com')
                                ->regex('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/')
                                ->helperText('Enter a valid email address'),
                        ]),
                        Tab::make('Adresse')
                            ->schema([
                                Select::make('country')
                                    ->label('Country')
                                    ->options([
                                        'AF' => 'Afghanistan',
                                        'AL' => 'Albania',
                                        'DZ' => 'Algeria',
                                        'AS' => 'American Samoa',
                                        'AD' => 'Andorra',
                                        'AO' => 'Angola',
                                        'AI' => 'Anguilla',
                                        'AQ' => 'Antarctica',
                                        'AG' => 'Antigua and Barbuda',
                                        'AR' => 'Argentina',
                                        'AM' => 'Armenia',
                                        'AW' => 'Aruba',
                                        'AU' => 'Australia',
                                        'AT' => 'Austria',
                                        'AZ' => 'Azerbaijan',
                                        'BS' => 'Bahamas',
                                        'BH' => 'Bahrain',
                                        'BD' => 'Bangladesh',
                                        'BB' => 'Barbados',
                                        'BY' => 'Belarus',
                                        'BE' => 'Belgium',
                                        'BZ' => 'Belize',
                                        'BJ' => 'Benin',
                                        'BM' => 'Bermuda',
                                        'BT' => 'Bhutan',
                                        'BO' => 'Bolivia',
                                        'BA' => 'Bosnia and Herzegovina',
                                        'BW' => 'Botswana',
                                        'BR' => 'Brazil',
                                        'BN' => 'Brunei Darussalam',
                                        'BG' => 'Bulgaria',
                                        'BF' => 'Burkina Faso',
                                        'BI' => 'Burundi',
                                        'CV' => 'Cabo Verde',
                                        'KH' => 'Cambodia',
                                        'CM' => 'Cameroon',
                                        'CA' => 'Canada',
                                        'KY' => 'Cayman Islands',
                                        'CF' => 'Central African Republic',
                                        'TD' => 'Chad',
                                        'CL' => 'Chile',
                                        'CN' => 'China',
                                        'CO' => 'Colombia',
                                        'KM' => 'Comoros',
                                        'CG' => 'Congo',
                                        'CD' => 'Congo, Democratic Republic of the',
                                        'CR' => 'Costa Rica',
                                        'CI' => 'Côte d\'Ivoire',
                                        'HR' => 'Croatia',
                                        'CU' => 'Cuba',
                                        'CY' => 'Cyprus',
                                        'CZ' => 'Czech Republic',
                                        'DK' => 'Denmark',
                                        'DJ' => 'Djibouti',
                                        'DM' => 'Dominica',
                                        'DO' => 'Dominican Republic',
                                        'EC' => 'Ecuador',
                                        'EG' => 'Egypt',
                                        'SV' => 'El Salvador',
                                        'GQ' => 'Equatorial Guinea',
                                        'ER' => 'Eritrea',
                                        'EE' => 'Estonia',
                                        'SZ' => 'Eswatini',
                                        'ET' => 'Ethiopia',
                                        'FI' => 'Finland',
                                        'FR' => 'France',
                                        'GA' => 'Gabon',
                                        'GM' => 'Gambia',
                                        'GE' => 'Georgia',
                                        'DE' => 'Germany',
                                        'GH' => 'Ghana',
                                        'GR' => 'Greece',
                                        'GL' => 'Greenland',
                                        'GD' => 'Grenada',
                                        'GT' => 'Guatemala',
                                        'GU' => 'Guam',
                                        'GW' => 'Guinea-Bissau',
                                        'GN' => 'Guinea',
                                        'GY' => 'Guyana',
                                        'HT' => 'Haiti',
                                        'HN' => 'Honduras',
                                        'HU' => 'Hungary',
                                        'IS' => 'Iceland',
                                        'IN' => 'India',
                                        'ID' => 'Indonesia',
                                        'IR' => 'Iran',
                                        'IQ' => 'Iraq',
                                        'IE' => 'Ireland',
                                        'IL' => 'Israel',
                                        'IT' => 'Italy',
                                        'JM' => 'Jamaica',
                                        'JP' => 'Japan',
                                        'JO' => 'Jordan',
                                        'KZ' => 'Kazakhstan',
                                        'KE' => 'Kenya',
                                        'KI' => 'Kiribati',
                                        'KW' => 'Kuwait',
                                        'KG' => 'Kyrgyzstan',
                                        'LA' => 'Lao People\'s Democratic Republic',
                                        'LV' => 'Latvia',
                                        'LB' => 'Lebanon',
                                        'LS' => 'Lesotho',
                                        'LR' => 'Liberia',
                                        'LY' => 'Libya',
                                        'LI' => 'Liechtenstein',
                                        'LT' => 'Lithuania',
                                        'LU' => 'Luxembourg',
                                        'MO' => 'Macao',
                                        'MK' => 'Macedonia',
                                        'MG' => 'Madagascar',
                                        'MW' => 'Malawi',
                                        'MY' => 'Malaysia',
                                        'MV' => 'Maldives',
                                        'ML' => 'Mali',
                                        'MT' => 'Malta',
                                        'MH' => 'Marshall Islands',
                                        'MQ' => 'Martinique',
                                        'MR' => 'Mauritania',
                                        'MU' => 'Mauritius',
                                        'YT' => 'Mayotte',
                                        'MX' => 'Mexico',
                                        'FM' => 'Micronesia (Federated States of)',
                                        'MD' => 'Moldova',
                                        'MC' => 'Monaco',
                                        'MN' => 'Mongolia',
                                        'ME' => 'Montenegro',
                                        'MS' => 'Montserrat',
                                        'MA' => 'Morocco',
                                        'MZ' => 'Mozambique',
                                        'MM' => 'Myanmar',
                                        'NA' => 'Namibia',
                                        'NR' => 'Nauru',
                                        'NP' => 'Nepal',
                                        'NL' => 'Netherlands',
                                        'NC' => 'New Caledonia',
                                        'NZ' => 'New Zealand',
                                        'NI' => 'Nicaragua',
                                        'NE' => 'Niger',
                                        'NG' => 'Nigeria',
                                        'NU' => 'Niue',
                                        'KP' => 'North Korea',
                                        'MP' => 'Northern Mariana Islands',
                                        'NO' => 'Norway',
                                        'OM' => 'Oman',
                                        'PK' => 'Pakistan',
                                        'PW' => 'Palau',
                                        'PA' => 'Panama',
                                        'PG' => 'Papua New Guinea',
                                        'PY' => 'Paraguay',
                                        'PE' => 'Peru',
                                        'PH' => 'Philippines',
                                        'PL' => 'Poland',
                                        'PT' => 'Portugal',
                                        'PR' => 'Puerto Rico',
                                        'QA' => 'Qatar',
                                        'RE' => 'Réunion',
                                        'RO' => 'Romania',
                                        'RU' => 'Russia',
                                        'RW' => 'Rwanda',
                                        'SH' => 'Saint Helena',
                                        'KN' => 'Saint Kitts and Nevis',
                                        'LC' => 'Saint Lucia',
                                        'PM' => 'Saint Pierre and Miquelon',
                                        'VC' => 'Saint Vincent and the Grenadines',
                                        'WS' => 'Samoa',
                                        'SM' => 'San Marino',
                                        'ST' => 'Sao Tome and Principe',
                                        'SA' => 'Saudi Arabia',
                                        'SN' => 'Senegal',
                                        'RS' => 'Serbia',
                                        'SC' => 'Seychelles',
                                        'SL' => 'Sierra Leone',
                                        'SG' => 'Singapore',
                                        'SX' => 'Sint Maarten',
                                        'SK' => 'Slovakia',
                                        'SI' => 'Slovenia',
                                        'SB' => 'Solomon Islands',
                                        'SO' => 'Somalia',
                                        'ZA' => 'South Africa',
                                        'KR' => 'South Korea',
                                        'SS' => 'South Sudan',
                                        'ES' => 'Spain',
                                        'LK' => 'Sri Lanka',
                                        'SD' => 'Sudan',
                                        'SR' => 'Suriname',
                                        'SE' => 'Sweden',
                                        'CH' => 'Switzerland',
                                        'SY' => 'Syria',
                                        'TW' => 'Taiwan',
                                        'TJ' => 'Tajikistan',
                                        'TZ' => 'Tanzania',
                                        'TH' => 'Thailand',
                                        'TL' => 'Timor-Leste',
                                        'TG' => 'Togo',
                                        'TK' => 'Tokelau',
                                        'TO' => 'Tonga',
                                        'TT' => 'Trinidad and Tobago',
                                        'TN' => 'Tunisia',
                                        'TR' => 'Turkey',
                                        'TM' => 'Turkmenistan',
                                        'TC' => 'Turks and Caicos Islands',
                                        'TV' => 'Tuvalu',
                                        'UG' => 'Uganda',
                                        'UA' => 'Ukraine',
                                        'AE' => 'United Arab Emirates',
                                        'GB' => 'United Kingdom',
                                        'US' => 'United States',
                                        'UY' => 'Uruguay',
                                        'UZ' => 'Uzbekistan',
                                        'VU' => 'Vanuatu',
                                        'VE' => 'Venezuela',
                                        'VN' => 'Vietnam',
                                        'WF' => 'Wallis and Futuna',
                                        'EH' => 'Western Sahara',
                                        'YE' => 'Yemen',
                                        'ZM' => 'Zambia',
                                        'ZW' => 'Zimbabwe',
                                    ])
                                    ->searchable(),
                                    TextInput::make('PLZ')
                                        ->label('PLZ')
                                        ->placeholder('3951')
                                        ->numeric()
                                        ->reactive(),
                                    TextInput::make('Ort')
                                        ->label('Ort')
                                        ->placeholder('Agarn')
                                        ->reactive(),
                                    TextInput::make('address')
                                        ->label('Adresse')
                                        ->placeholder('Musterstrasse 69')
                                        ->reactive(),
                                ]),
                ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWawiSupplier::route('/'),
            'create' => CreateWawiSupplier::route('/create'),
            'edit' => EditWawiSupplier::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        // Use toggleable() to allow users to select visible columns.
        // Important: Key columns should not be toggleable.
        $tableComponents = [

        ];

        return $table
            ->columns($tableComponents)
            ->filters([
                
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}